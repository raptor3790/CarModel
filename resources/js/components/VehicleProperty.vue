<template>

  <form
    @submit="checkForm"
  >
    <div class="form-group">
      <label for="color">Color*</label>
      <select
        id="color"
        v-model="color"
        class="form-control"
        required
        @blur="update('color', color)"
      >
        <option
          v-for="($color, $index) in colors"
          :key="`color${$index}`"
          :value="$index === 0 ? '' : $color"
        >{{ $color }}
        </option>
      </select>
    </div>
    <div class="form-group" v-if="model === 'Grand Cherokee'">
      <label for="drivetrain">Drivetrain*</label>
      <select
        id="drivetrain"
        v-model="drivetrain"
        class="form-control"
        required
        @blur="update('drivetrain', drivetrain)"
      >
        <option value="2X4">2X4</option>
        <option value="4X4">4X4</option>
      </select>
    </div>
    <div class="input-group mb-3">
      <label for="picture">Upload Picture</label>
      <div class="custom-file w-100">
        <input type="file" class="custom-file-input" id="picture" disabled>
        <label class="custom-file-label" for="picture">Choose file</label>
      </div>
      <small id="pictureHelp" class="form-text text-muted">Picture uploading feature is not implemented in this test version...</small>
    </div>
    <button type="button" class="btn btn-secondary" @click="onBack">Back</button>
    <button type="submit" class="btn btn-primary" :disabled="confirmedDialog">Get Quote</button>
  </form>
</template>

<script>
import Vue from 'vue'
import axios from 'axios'
import VuejsDialog from 'vuejs-dialog'
import 'vuejs-dialog/dist/vuejs-dialog.min.css'

Vue.use(VuejsDialog)

export default {
  props: ['model', 'milage', 'formData'],
  data () {
    return {
      colors: ['Please select color', 'White', 'Silver', 'Black', 'Other'],
      color: '',
      drivetrain: '2X4',
      picture: '',
      confirmedDialog: false
    }
  },
  methods: {
    onBack () {
      history.back()
    },
    checkForm (e) {
      e.preventDefault()

      if (this.milage > 100000) {
        // alert
        const dis = this
        this.$dialog.alert('We can insure your car').then(function (dialog) {
          dis.confirmedDialog = true
        })
      }
    },
    update (field, value) {
      if (!value || value.length === 0) {
        return
      }

      axios.put(`/api/update/${field}/${value}`).then(({ data }) => console.log(`update success ${data}`))
    }
  },
  mounted () {
    console.log('General info mounted')

    if (this.formData) {
      this.color = this.formData.color
      this.drivetrain = this.formData.drivetrain
    }
  }
}
</script>
