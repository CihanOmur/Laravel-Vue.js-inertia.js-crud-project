<template>
  <table class="w-full whitespace-nowrap">
    <thead>
      <tr class="border px-4 py-2">
        <slot name="tableheader" />
      </tr>
    </thead>
    <tbody>
      <slot name="tablebody" />
    </tbody>
  </table>
</template>