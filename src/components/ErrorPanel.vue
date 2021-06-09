<template>
    <div class="p-10 text-center absolute w-full h-100 -top-0 -right-0 -left-0 -bottom-0 flex align-middle content-center justify-center items-center flex-col bg-wc-blue ">
        <span class="block text-red-800"><slot></slot></span>
    </div>

</template>
<script>
export default {
  name: 'ErrorPanel'
}
</script>
