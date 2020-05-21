<template>
  <ul id="step-bar">
    <li :class="activeClass(1)">Vehicle Detail</li>
    <li :class="activeClass(2)">Vehicle Property</li>
  </ul>
</template>

<style lang="scss" scoped>

#step-bar {
  overflow: hidden;
  text-align: center;
  /*CSS counters to number the steps*/
  counter-reset: step;

  li {
    list-style-type: none;
    color: white;
    text-transform: uppercase;
    font-size: 9px;
    width: 50%;
    float: left;
    position: relative;
    letter-spacing: 1px;

    &:before {
      content: counter(step);
      counter-increment: step;
      width: 24px;
      height: 24px;
      line-height: 26px;
      display: block;
      font-size: 12px;
      color: #333;
      background: white;
      border-radius: 25px;
      margin: 0 auto 10px auto;
    }

    &:after {
      content: '';
      width: 100%;
      height: 2px;
      background: white;
      position: absolute;
      left: -50%;
      top: 9px;
      z-index: -1; /*put it behind the numbers*/
    }

    &:first-child:after {
    /*connector not needed before the first step*/
      content: none;
    }

    &.active:before, &.active:after {
      background: #ee0979;
      color: white;
    }
  }
}
</style>

<script>
export default {
  props: ['active'],
  methods: {
    activeClass (index) {
      return this.active >= index ? 'active' : ''
    }
  }
}
</script>
