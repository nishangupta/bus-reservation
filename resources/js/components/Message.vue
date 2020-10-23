<template>
  <div
    :class="`message-media ${
      data.sender == currentUserId ? 'user-message' : ''
    } w-50 mb-3`"
  >
    <div class="media-body ml-3">
      <div class="bg-light rounded py-2 px-3 mb-2">
        <p class="text-small mb-0 text-muted">
          {{ data.txt }}
        </p>
      </div>
      <p class="small text-muted">{{ data.created_date }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "messages",
  props: ["data", "currentUserId"],
};
</script>

<style lang="scss">
.user-message {
  margin-left: auto;
  .media-body {
    & > div {
      background-color: #4e73df !important;
      p {
        color: white !important;
      }
    }
  }
}
</style>