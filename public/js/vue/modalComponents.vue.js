Vue.component("modal-edit-form", {
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
        }
    },
    template: `<div>
                    <div class="form-group">
                        <label :for="formName" v-text="formName" v-if="!isId"></label>
                        <input :type="getType" class="form-control" :name="formName" :id="formName" :value="formData" :placeholder="ifPassword">
                    </div>
                </div>`,
});

Vue.component("modal-add-form", {
    props: {
        formName: String,
        formType: [String, Number],
        options: Object,
    },
    template: `<div class="form-group" v-if="formType !== 'select'">
                    <label :for="formName" v-text="formName"></label>
                    <input :type="formType" class="form-control" :name="formName" :id="formName" value="" :placeholder="formName">
                </div>
                
                <div v-else>
                    <select :name="formName" class="form-control">
                        <option v-for="(value, name) in options" :value="value" v-text="name"></option>
                    </select>
                    <div class="form-group">
                        <label for="section-name">Section Name</label>
                        <input type="text" class="form-control" name="section-name" id="section-name" placeholder="Section Name">
                    </div>
                </div>`

});