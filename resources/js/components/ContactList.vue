<template>
  <div class="messages-box clientbox">
    <div class="list-group rounded-0">
      <a
        href="javascript:void(0);"
        class="list-group-item list-group-item-action active text-white rounded-0"
        v-if="!isAdmin"
      >
        <div class="media">
          <img
            src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg"
            alt="user"
            width="50"
            class="rounded-circle"
          />
          <div class="media-body ml-4">
            <div class="d-flex align-items-center justify-content-between mb-1">
              <h6 class="mb-0">Admin</h6>
              <!-- <small class="small font-weight-bold">25 Dec</small> -->
            </div>
            <p class="font-italic mb-0 text-small">Any query please chat</p>
          </div>
        </div>
      </a>

      <a
        href="javascript:void(0);"
        :class="`list-group-item list-group-item-action rounded-0 
        ${selectedIndex === customer.id ? 'active text-white' : ''} `"
        @click="select(customer.id)"
        v-else
        v-for="customer in customers"
        :key="customer.id"
      >
        <div class="media">
          <img
            src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg"
            alt="user"
            width="50"
            class="rounded-circle"
          />
          <div class="media-body ml-4">
            <div class="d-flex align-items-center justify-content-between mb-1">
              <h6 class="mb-0">{{ customer.name }}</h6>
            </div>
            <p class="font-italic mb-0 text-small">
              {{ customer.email }}
            </p>
          </div>
        </div>
      </a>
    </div>
  </div>
</template>

<script>
export default {
  name: "contactlist",
  props: ["isAdmin"],
  data() {
    return {
      customers: [],
      selectedIndex: null,
    };
  },
  mounted() {
    if (this.isAdmin) {
      this.getCustomerList();
    }
  },
  methods: {
    getCustomerList() {
      axios
        .get("get-customer-list")
        .then((res) => res.data)
        .then((data) => {
          this.customers = data;
        });
    },
    select(id) {
      this.selectedIndex = id;
      this.$emit("loadCustomerMessages", id);
      this.$emit("selectedIndex", id);
    },
  },
};
</script>

<style>
</style>