<template>
  <div class="container py-2 px-4">
    <div class="row rounded-lg overflow-hidden shadow">
      <!-- Users box-->
      <div class="col-md-3 col-sm-12 px-0">
        <div class="bg-white">
          <div class="bg-gray px-4 py-2 bg-light">
            <p class="h5 mb-0 py-1">Recent</p>
          </div>

          <ContactList
            :isAdmin="isAdmin"
            v-on:loadCustomerMessages="loadCustomerMessages"
            v-on:selectedIndex="selectedIndex"
          />
        </div>
      </div>
      <!-- Chat Box-->
      <div class="col-md-9 col-sm-12 px-0 chatbox">
        <div class="px-4 py-5 bg-white chatbox-list">
          <Message
            v-for="message in messages"
            :key="message.id"
            :data="message"
            :currentUserId="user.id"
          />
        </div>

        <ChatInput v-on:sendMessage="sendMessage" />
      </div>
    </div>
  </div>
</template>

<script>
import ContactList from "./ContactList";
import ChatInput from "./ChatInput";
import Message from "./Message";
import axios from "axios";
export default {
  name: "chat-component",
  components: {
    ContactList,
    ChatInput,
    Message,
  },
  data: () => {
    return {
      messages: [],
      currentIndex: null,
    };
  },
  props: ["user"],
  mounted() {
    if (!this.isAdmin) {
      setInterval(this.getMessages, 5000);
    }
  },
  computed: {
    isAdmin: function () {
      return this.user.id == 1;
    },
  },
  methods: {
    getMessages() {
      axios
        .get("/get-messages")
        .then((res) => res.data)
        .then((data) => {
          this.messages = data;
        })
        .catch((e) => console.log(e));
    },

    //props emit function
    sendMessage(txt) {
      let options = {
        sender: this.user.id,
        receiver: 1, //admin id
        txt,
      };
      if (this.user.id == 1) {
        //if user is admin
        options.sender = 1; //admin id
        options.receiver = this.currentIndex;
      }
      axios
        .post("/chats", options)
        .then((res) => {
          this.messages.unshift(res.data.message);
          console.log(res.data.message);
        })
        .catch((e) => console.log(e));
    },
    loadCustomerMessages(id) {
      axios
        .get("/get-customer-messages/" + id)
        .then((res) => res.data)
        .then((data) => {
          this.messages = data;
        })
        .catch((e) => console.log(e));
    },
    selectedIndex(id) {
      this.currentIndex = id;
    },
  },
};
</script>

<style>
</style>