<template>
    <div>
        <div class="form-group" v-if="!excluded">
            <label :for="formName" v-text="formName" v-if="!isId"></label>
            <input :type="getType" class="form-control" :name="formName" :id="formName" :value="formData"
                   :placeholder="ifPassword">
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            formName: String,
            formData: [String, Number],
            isId: {
                type: Boolean,
                default: false
            }
        },

        computed: {
            getType() {
                return this.isId === false ? "text" : "hidden";
            },

            ifPassword() {
                return this.formName === "password" ? "Update password (Optional)" : this.formName;
            },

            excluded() {
                return this.formName === "advisory";
            }
        },
    }
</script>
