
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
//sparkline for generating line graphs
window.Sparkline = require('jquery-sparkline');
//chart.js for generating charts
window.Chart = require('chart.js');

require('./pie-chart');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('modal-edit-form', require('./components/modalEditForm.vue'));
Vue.component('modal-add-form', require('./components/modalAddForm.vue'));
Vue.component('modal-select-form', require('./components/modalSelectForm.vue'));
Vue.component('assign-tab', require('./components/assignTab.vue'));
Vue.component('assign-tab-panel', require('./components/assignTabPanel.vue'));

let editModal = new Vue({
    el: '#edit-modal-body',
    data: {
        message: 'Hello Vue',
        responses: {}
    },

    methods: {
        checkIfId(key) {
            switch (key) {
                case 'id':
                case 'subject_id':
                case 'student_id':
                    return true;
                default:
                    return false;
            }

        }
    }

});

let addModal = new Vue({
    el: '#add-modal-body',
    data: {
        fields: {},

        teacherFields: {
            username: "text",
            password: "password",
            first_name: "text",
            middle_name: "text",
            last_name: "text",
            age: "number",
            advisory: "number",
        },

        studentFields: {
            username: "text",
            password: "password",
            first_name: "text",
            middle_name: "text",
            last_name: "text",
            age: "number",
        },

        assignmentFields: {
            title: "text",
            description: "text",
            "deadline_date": "date",
            "deadline_time": "time",
        },

        levelFields: {},

        subjectFields: {},

        assignment: {
            subject_id: 0
        }
    }

});

let deleteModal = new Vue({
    el: '#delete-modal-body',
    data: {
        deleteLink: "",
        username: "",
    }
});

let assignModal = new Vue({
    el: '#assign-modal-body',
    data: {
        id: 3,
    }
});

let teachersTable = new Vue({
    el: '#teachers-table',

    methods: {
        showEditModal(baseurl, username) {
            console.log(baseurl + username);
            axios.get(baseurl + username, {
                headers: {'X-Requested-With': 'XMLHttpRequest'}
            }).then(function (response) {
                editModal.responses = response.data;
                editModal.responses.password !== undefined ? editModal.responses.password = "" : "";
                console.log(response.data);
            }).catch(function (error) {
                console.log(error);
            });
            $('#edit-modal').modal('show');
        },

        showAddModal(field, param = null) {
            switch (field) {
                case 'teacher':
                    addModal.fields = addModal.teacherFields;
                    break;
                case 'student':
                    addModal.fields = addModal.studentFields;
                    break;
                case 'assignment':
                    addModal.fields = addModal.assignmentFields;
                    addModal.assignment.subject_id = param;
                    break;
                case 'level':
                    addModal.fields = {levelId: "select"};
                    axios.get('/resource/levels', {
                        headers: {'X-Requested-With': 'XMLHttpRequest'}
                    }).then(function (response) {
                        for (const datum of response.data) {
                            Vue.set(addModal.levelFields, datum.name, datum.id)
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
                    break;
                case 'subject':
                    addModal.fields = {teacherId: "select"};
                    axios.get('/registrar/teachers', {
                        headers: {'X-Requested-With': 'XMLHttpRequest'}
                    }).then(function (response) {
                        for (const datum of response.data) {
                            Vue.set(addModal.subjectFields, (datum.first_name + ' ' + datum.middle_name + ' ' + datum.last_name), datum.id)
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
                    break;
            }

            $('#add-modal').modal('show');
        },

        showDeleteModal(type, username) {
            switch (type) {
                case 'teacher':
                    deleteModal.deleteLink = '/resource/teacher/' + username;
                    break;

                case 'student':
                    deleteModal.deleteLink = '/resource/student/' + username;
                    break;
                case 'assignment':
                    username = JSON.parse(username);
                    deleteModal.deleteLink = '/resource/assignments/' + username.id;
                    username = "TITLE: " + username.title + "<br> DESCRIPTION: " + username.description;
                    break;
            }

            deleteModal.username = username;
            $('#delete-modal').modal('show');
        },

        //just logging the type for now
        showAssignModal(type, id) {
            console.log(type);
            assignModal.id = id;
            $('#assign-modal').modal('show');
        }
    },
});
// $('#assign-modal').modal('show');
