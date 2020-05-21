<template>
  <form
    @submit="checkForm"
  >
    <div class="form-group">
      <label for="case">Case*</label>
      <input
        v-model="caseValue"
        id="case"
        type="text"
        class="form-control"
        required
        @blur="update('case', caseValue)"
      >
    </div>
    <div class="form-group">
      <label for="make">Make*</label>
      <select
        id="make"
        v-model="make"
        class="form-control"
        required
        @blur="update('make', make)"
        @change="model = ''"
      >
        <option
          v-for="($make, $index) in makes"
          :key="`make${$index}`"
          :value="$index === 0 ? '' : $make"
        >{{ $make }}
        </option>
      </select>
    </div>
    <div class="form-group">
      <label for="model">Model*</label>
      <select
        id="model"
        v-model="model"
        class="form-control"
        required
        @blur="update('model', model)"
      >
        <option
          v-for="($model, $index) in models"
          :key="`model${$index}`"
          :value="$index === 0 ? '' : $model"
        >{{ $model }}
        </option>
      </select>
    </div>
    <div class="form-group">
      <label for="milage">Milage*</label>
      <input
        v-model="milage"
        id="milage"
        type="number"
        class="form-control"
        required
        @blur="update('milage', milage)"
      >
    </div>
    <div class="form-group mb-3">
      <label for="buyDate">Buying Date*</label>
      <date-picker
        v-model="buyDate"
        :config="dateOptions"
        id="buyDate"
        type="date"
        class="form-control"
        required
        @dp-change="update('buy_at', buyDate)"
      ></date-picker>
    </div>
    <button type="submit" class="btn btn-primary">Next</button>
  </form>
</template>

<script>
import axios from 'axios'
import datePicker from 'vue-bootstrap-datetimepicker'

export default {
  props: ['makeData', 'modelData', 'formData', 'propertyUrl'],
  components: {
    datePicker
  },
  data () {
    return {
      caseValue: '',
      make: '',
      model: '',
      milage: 0,
      buyDate: '',
      dateOptions: {
        format: 'YYYY-MM-DD',
        useCurrent: false
      }
    }
  },
  computed: {
    makes () {
      return ['Please select make'].concat(this.makeData)
    },
    models () {
      const ary = ['Please select model']
      if (this.make.length > 0) {
        return ary.concat(this.modelData[this.make])
      }
      return ary
    }
  },
  methods: {
    checkForm (e) {
      e.preventDefault()
      document.location.href = this.propertyUrl
    },
    update (field, value) {
      if (!value || value.length === 0) {
        return
      }

      axios.put(`/api/update/${field}/${value}`).then(({ data }) => console.log(`update success ${data}`))
    }
  },
  mounted () {
    console.log('Vehicle mounted.')

    if (this.formData) {
      this.caseValue = this.formData.case
      this.make = this.formData.make
      this.model = this.formData.model
      this.milage = this.formData.milage
      this.buyDate = this.formData.buy_at
    }
  }
}
</script>
