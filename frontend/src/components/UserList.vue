<script>
let users = reactive({ users: [] });
onMounted(async () => {
  try {
    const { data } = await http.get("/users");
    users.users = data;
  } catch (error) {
    console.log(error);
  }
});
</script>

<template></template>
