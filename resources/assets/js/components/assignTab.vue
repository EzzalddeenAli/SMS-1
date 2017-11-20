<template>
<div>
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
</div>
</template>

<script>
    export default {
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
    }
</script>
