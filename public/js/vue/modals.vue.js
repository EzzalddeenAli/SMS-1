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
        fields: {
            levelId: "select"
        },

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

        levelFields: {
        },
    }

});

let deleteModal = new Vue({
    el: '#delete-modal-body',
    data: {
        deleteLink: "",
        username: "",
    }
});

let teachersTable = new Vue({
    el: '#teachers-table',

    methods: {
        showEditModal(baseurl, username) {
            $.get(baseurl + username, function (data) {
                editModal.responses = data;

                for (const formName of Object.keys(data)) {
                    if (formName === "password") {
                        editModal.responses.password = "";
                    }
                }

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
                    $.get('/registrar/levels', function (data) {
                        for (const datum of data) {
                            Vue.set(addModal.levelFields, datum.name, datum.id)
                        }
                    });
                    break;
            }

            $('#add-modal').modal('show');
        },

        showDeleteModal(type, username) {
            switch (type) {
                case 'teacher':
                    deleteModal.deleteLink = '/admin/teacher/' + username;
                    break;

                case 'student':
                    deleteModal.deleteLink = '/registrar/student/' + username;
                    break;
            }

            deleteModal.username = username;
            $('#delete-modal').modal('show');
        }
    },
});