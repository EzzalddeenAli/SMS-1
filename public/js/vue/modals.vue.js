let editModal = new Vue({
    el: '#edit-modal-body',
    data: {
        message: 'Hello Vue',
        responses: []
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
            section_id: "number",
        },

        levelFields: {},

        subjectFields: {}
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
});

let teachersTable = new Vue({
    el: '#teachers-table',

    methods: {
        showEditModal(baseurl, username) {
            axios.get(baseurl + username, {
                headers: {'X-Requested-With': 'XMLHttpRequest'}
            }).then(function (response) {
                editModal.responses = response.data;
                editModal.responses.password !== undefined ? editModal.responses.password = "" : "";
            }).catch(function (error) {
                console.log(error);
            });
            $('#edit-modal').modal('show');
        },

        showAddModal(field) {
            switch (field) {
                case 'teacher':
                    addModal.fields = addModal.teacherFields;
                    break;
                case 'student':
                    addModal.fields = addModal.studentFields;
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
            }

            deleteModal.username = username;
            $('#delete-modal').modal('show');
        },

        showAssignModal() {
            $('#assign-modal').modal('show');
        }
    },
});
// $('#assign-modal').modal('show');