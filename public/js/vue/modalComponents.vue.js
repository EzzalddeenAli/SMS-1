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
        },

        excluded() {
            return this.formName === "advisory";
        }
    },
    template: `<div>
                    <div class="form-group" v-if="!excluded">
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

    computed: {
        excluded() {
            return this.formName === "advisory";
        }
    },
    template: `<div v-if="formType !== 'select'">
                    <div class="form-group" v-if="!excluded">
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

Vue.component("teacher-select-form", {
    data() {
        return {
            sections: {none: ''}
        }
    },

    created() {
        axios.get('/resource/sections', {
            headers: {'X-Requested-With': 'XMLHttpRequest'}
        }).then(response => {
            for (const datum of response.data) {
                Vue.set(this.sections, datum.name, datum.level_id)
            }
        });
    },

    template: `<div>
                    <div class="form-group">
                        <label>Advisory</label>
                        <select name="advisory" class="form-control">
                            <option  v-for="(id, name) in sections" :value="id" v-text="name"></option>
                        </select>
                    </div>
               </div>`
});