Vue.component('modal-edit-form', {
    props: {
        formName: String,
        formData: [String, Number],
        isId: {
            type: Boolean,
            default: false,
        }
    },

    computed: {
        getType() {
            return this.isId === false ? "text" : "hidden";
        },

        ifPassword() {
            return this.formName === "password" ? "Update password (Optional)" : this.formName;
        }
    },
    template: `<div>
                    <div class="form-group">
                        <label :for="formName" v-text="formName" v-if="!isId"></label>
                        <input :type="getType" class="form-control" :name="formName" :id="formName" :value="formData" :placeholder="ifPassword">
                    </div>
                </div>`,
});

Vue.component('modal-add-form', {
    props: {
        formName: String,
        formType: String,
    },
    template: `<div class="form-group">
                    <label :for="formName" v-text="formName"></label>
                    <input :type="formType" class="form-control" :name="formName" :id="formName" value="" :placeholder="formName">
                </div>`

});