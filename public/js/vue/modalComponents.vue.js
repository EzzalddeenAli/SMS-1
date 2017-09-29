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
                    <div class="form-group" v-if="!excluded && !isId">
                        <label :for="formName" v-text="formName"></label>
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

Vue.component("assign-tab", {
    data() {
        return {
            levels: {}
        }
    },

    created() {
        axios.get('/admin/teachers', {
            headers: {'X-Requested-With': 'XMLHttpRequest'}
        }).then(response => {
/*            for (const datum of response.data) {
                console.log(datum);
                this.levels.push(datum);
                Vue.set(this.levels, datum.name, datum.id);
            }*/
            console.log(response.data);
            this.levels = response.data;
        });
    },

    methods: {
        console(text) {
            console.log(text);
        }
    },

    template:`<div>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-level="elem" href="#">Elementary</a></li>
                    <li><a data-level="high" href="#">Highschool</a></li>
                    <li><a data-level="senior" href="#">Senior High</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!--elementary tab-->
                    <div class="tab-pane active" id="elem">
                        <div class="panel panel-default" v-for="(section, id) in levels">
                        	  <div class="panel-heading">
                        	    <a class="panel-title" :href="'#panel' + id" data-toggle="collapse" v-text="section.name" @click="console(levels)"></a>
                        	  </div>
                        	  
                        	  <div class="panel-body collapse" :id="'panel' + id">Panel Body</div>
                        </div>
                    </div>
                    <!--High school tab-->
                    <div class="tab-pane" id="high"></div>
                    <!--Senior High school tab-->
                    <div class="tab-pane" id="senior"></div>
                </div>
              </div>`
});