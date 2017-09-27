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
        extraOptions: Object,
    },
    template: `<div v-if="formType !== 'select'">
                    <div class="form-group">
                        <label :for="formName" v-text="formName"></label>
                        <input :type="formType" class="form-control" :name="formName" :id="formName" value="" :placeholder="formName">
                    </div>
                </div>

                <div v-else>
                    <select :name="formName" class="form-control">
                        <option v-for="(value, name) in options" :value="value" v-text="name"></option>
                    </select>
                    <div class="form-group" v-for="(type, field) in extraOptions">
                        <label :for="field" v-text="field"></label>
                        <input :type="type" class="form-control" :name="field" :id="field" value="" :placeholder="field">
                    </div>
                </div>`

});

Vue.component("modal-select-form", {
    template: `<select name="formName" class="form-control">
                    <option value="value">It's time</option>
                </select>`
});