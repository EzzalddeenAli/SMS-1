Vue.component('modal-form', {
    // props: ['formName', 'formData', 'isId'],
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
        }
    },
    template: `<div>
                    <div class="form-group">
                        <label :for="formName" v-text="formName" v-if="!isId"></label>
                        <input :type="getType" class="form-control" :name="formName" :id="formName" :value="formData" placeholder="Username">
                    </div>
                </div>`,
});