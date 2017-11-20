<template>
<div>
    <div class="form-group">
        <label>{{ user }}</label>
        <select :name="formName" class="form-control" v-model="levelValue" @change="levelSelected()">
            <option v-for="(id, name) in levels" :value="id" v-text="name"></option>
        </select>
        <select :name="formName" class="form-control">
            <option  v-for="(id, name) in sections" :value="id" v-text="name"></option>
        </select>
    </div>
</div>
</template>

<script>
    export default {
        props: {
            userType: String,
        },

        methods: {
            levelSelected() {
                // console.log("resource/level/" + this.levelValue);
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
    }
</script>
