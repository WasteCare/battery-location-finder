<template>
    <div class="absolute w-full h-100 -top-0 -right-0 -left-0 -bottom-0 bg-wc-blue flex align-middle content-center justify-center items-center flex-col">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 89.41 233.95" class="w-10">
            <path id="battery-outline" class="battery-outline" d="M285.09,167.6h-8a7.41,7.41,0,0,0-7.39-7.38H240.16a7.4,7.4,0,0,0-7.38,7.38h-8a12.59,12.59,0,0,0-12.55,12.55V377.62a12.59,12.59,0,0,0,12.55,12.55h60.32a12.59,12.59,0,0,0,12.55-12.55V180.15A12.59,12.59,0,0,0,285.09,167.6Z" transform="translate(-210.22 -158.22)"/>
            <path id="battery-blip" class="battery-blip" d="M285.09,167.6h-8a7.41,7.41,0,0,0-7.39-7.38H240.16a7.4,7.4,0,0,0-7.38,7.38h-8a12.59,12.59,0,0,0-12.55,12.55V377.62a12.59,12.59,0,0,0,12.55,12.55h60.32a12.59,12.59,0,0,0,12.55-12.55V180.15A12.59,12.59,0,0,0,285.09,167.6Z" transform="translate(-210.22 -158.22)"/>
            <rect class="battery-fill" x="11.47" width="66.84" rx="6.68"/>
        </svg>
        <span class="block mt-4 animate-pulse text-wc-grey">Loading</span>
    </div>

</template>
<script>
export default {
  name: 'Loader'
}
</script>
<style lang="css">

    svg .battery-outline {
        isolation:isolate;
        stroke-linecap: round;
        stroke:#777777;
        fill: transparent;
        opacity: 1;
        fill:transparent;
        stroke-width: 4px;
        stroke-miterlimit:10;
    }

    svg .battery-blip {
        isolation:isolate;
        stroke-dasharray: 301;
        stroke-linecap: round;
        animation: dash 2s cubic-bezier(0.25, 0.46, 0.45, 0.94) infinite;
        stroke:#edf1f4;
        fill: transparent;
        opacity: 1;
        fill:transparent;
        stroke-width: 4px;
        stroke-miterlimit:10;
    }

    svg .battery-fill {
        fill: #3fa649;
        stroke:#3fa649;
        stroke-width:2px;
        animation: deplete 2s linear infinite;
        opacity: 0;
    }

@keyframes dash {
    from {
        stroke-dashoffset: 602;
    }
    to {
        stroke-dashoffset: 0;
    }
  }

  @keyframes deplete {
      from {
          y: 18.93;
          height: 204.03px;
          opacity: 0;
      }
      25% {
          opacity: 1;
      }
      to {
          y: 220.93;
          height: 0px;
          fill: #cc0000;
          stroke: #cc0000;
          opacity: 1;
      }
  }
</style>
