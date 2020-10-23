<template>
  <form class="bg-light">
    <input type="hidden" />
    <div class="input-group border">
      <input
        type="text"
        placeholder="Type a message"
        class="form-control rounded-0 border-0 py-4 bg-light"
        v-model="txt"
      />
      <div class="input-group-append">
        <button
          id="button-addon2"
          type="submit"
          @click.prevent="sendMessage"
          class="btn btn-link"
        >
          <i class="fa fa-paper-plane"></i>
        </button>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  name: "chat-input",
  data() {
    return {
      txt: "",
    };
  },
  methods: {
    sendMessage() {
      if (this.txt.trim() == "") return;
      this.$emit("sendMessage", this.txt);
      this.txt = "";
    },
  },
};
</script>

<style>
</style>