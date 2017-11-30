<template>
    <div>
        <div class="form-group" v-if="!excluded">
            <label :for="formName" v-text="formName" v-if="!isId"></label>
            <input :type="getType" class="form-control" :name="formName" :id="formName" :value="formData"
                   :placeholder="ifPassword">
        </div>
        <div class="form-group" v-if="isImage">
            <label :for="formName">Photo <span class="inline help-block">format: .png, .jpeg, .jpg</span></label>
            <input type="file" class="form-control" :name="formName" :id="formName">
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

            isImage() {
                let image = ["path"];
                return image.includes(this.formName); //return true if formName has a match in array
            },

            excluded() {
                let excluded = ["advisory", "section_id", "path", "ext"];
                return excluded.includes(this.formName); //return true if formName has a match in array
            }
        },
    }
</script>
