<template>
    <div>
        <h1>Add Contact</h1>
        <div class="card bg-[#f3f6ff] flex justify-center items-center min-h-screen">
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" v-model="contact.name" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" v-model="contact.email" />
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" class="form-control" v-model="contact.phone" />
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: purple;">Add Contact</button>
                </form>
            </div>
        </div>
    </div>
    
</template>

<script>
export default {
    data() {
        return {
            contact: {
                name: '',
                email: '',
                phone: ''
            }
        };
    }
};
</script>

<style>
.card {
    margin: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
</style>
