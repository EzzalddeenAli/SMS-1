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

Vue.component("modal-select-form", {
    props: {
        userType: String,
    },

    methods: {
        levelSelected() {
            console.log("resource/level/" + this.levelValue);
            axios.get("/resource/level/" + this.levelValue, {
                headers: {"X-Requested-With": "XMLHttpRequest"}
            }).then(response => {
                this.sections = response.data.length > 0 ? {'Please select level first': ''} : {'No levels found': ''};
                for (const datum of response.data) {
                    Vue.set(this.sections, datum.name, datum.id)
                }
            }).catch(error => {
                console.log(error);
            });
        }
    },

    data() {
        return {
            levels: {},
            sections: {'Please select level first': ''},
            user: "",
            levelValue: 1,
            formName: '',
        }
    },

    created() {
        this.levelSelected();
        axios.get("/resource/levels", {
            headers: {"X-Requested-With": "XMLHttpRequest"}
        }).then(response => {
            for (const datum of response.data) {
                Vue.set(this.levels, datum.name, datum.id)
            }
        });

        switch (this.userType) {
            case "teacher":
                this.user = "Advisory";
                this.formName = 'advisory';
                break;
            case "student":
                this.user = "Section";
                this.formName = 'section_id';
                break;
        }
    },

    template: `<div>
                    <div class="form-group">
                        <label>{{ user }}</label>
                        <select :name="formName" class="form-control" v-model="levelValue" @change="levelSelected()">
                            <option v-for="(id, name) in levels" :value="id" v-text="name"></option>
                        </select>
                        <select :name="formName" class="form-control">
                            <option  v-for="(id, name) in sections" :value="id" v-text="name"></option>
                        </select>
                    </div>
               </div>`
});

Vue.component("assign-tab", {
    props: {
        teacherId: [String, Number],
    },

    data() {
        return {
            levels: {
                elem: {},
                junior: {},
                senior: {},
            }
        }
    },

    created() {
        axios.get('/admin/teachers', {
            headers: {'X-Requested-With': 'XMLHttpRequest'}
        }).then(response => {
            let tab = 1;
            for (const datum of response.data) {
                switch (datum.name) {
                    case 'Grade7':
                        tab = 2;
                        break;

                    case 'Grade11':
                        tab = 3;
                        break;
                }

                switch (tab) {
                    case 1:
                        Vue.set(this.levels.elem, datum.name, datum);
                        break;
                    case 2:
                        Vue.set(this.levels.junior, datum.name, datum);
                        break;
                    case 3:
                        Vue.set(this.levels.senior, datum.name, datum);
                        break;
                }
            }
        });
    },

    methods: {
        console(text) {
            console.log(text);
        }
    },

    template:`<div>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#elem" data-toggle="tab">Elementary</a></li>
                    <li><a href="#junior" data-toggle="tab">Junior High</a></li>
                    <li><a href="#senior" data-toggle="tab">Senior High</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <input type="hidden" name="teacherId" :value="teacherId">
                    <div :class="{'tab-pane': true, 'active': (index === 0)}" :id="level" v-for="(obj, level, index) in levels">
                        <assign-tab-panel :level="obj"></assign-tab-panel>
                    </div>
                </div>
              </div>`
});

Vue.component("assign-tab-panel", {
    props: {
        level: Object,
    },
    template: `<div>
                 <div class="panel panel-default" v-for="(obj, name) in level">
                  <div class="panel-heading">
                    <a class="panel-title" :href="'#panel' + obj.id" data-toggle="collapse" v-text="name"></a>
                  </div>
                          
                  <div class="panel-body collapse" :id="'panel' + obj.id">
                  <p class="help-block" v-if="obj.sections.length === 0">No sections found</p>
                     <div v-for="(section, key) in obj.sections">
                        <p class="text-success">{{section.name}}</p>
                        <p class="help-block" v-if="section.subjects.length === 0">No subjects found</p>
                        <label class="checkbox-inline" v-for="(subject, key) in section.subjects">
                            <input type="checkbox" name="subjects[]" :value="subject.id">{{subject.name}}
                        </label>
                        <hr>
                     </div>
                  </div>
                 </div>
               </div>`
});