<template>
    <button @click="onClick"
        class="border border-wc-green rounded-none inline-block py-3 px-6 leading-6 text-center transition-all ease-in-out rounded-tl-3xl rounded-br-3xl text-xs hover:rounded-3xl hover:bg-wc-green hover:text-white"
        :class="{ 'border-wc-blue-button text-white bg-wc-blue-button hover:bg-wc-blue-button' : isDark }">
        <slot>Button</slot>
    </button>
</template>

<script>
export default {
  name: 'WCButton',
  props: {
    onClick: {
      type: Function,
      required: false
    },
    isDark: {
      type: Boolean,
      required: false
    }
  }
}
</script>
