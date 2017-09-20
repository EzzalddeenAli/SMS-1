let editModal = new Vue({
    el: '#edit-modal-body',
    data: {
        message: 'Hello Vue',
        responses: []
    },

    methods: {
        checkIfId(key) {
            return key === 'id';
        }
    }

});

let addModal = new Vue({
    el: '#add-modal-body',
    data: {
        fields: {
            username: "text",
            password: "password",
            first_name: "text",
            middle_name: "text",
            last_name: "text",
            age: "number",
            advisory: "number",
        },
    }
});

let teachersTable = new Vue({
    el: '#teachers-table',

    methods: {
        showEditModal(username) {
            $.get('/admin/teachers/' + username, function (data) {
                editModal.responses = data[0];
                editModal.responses.password = "";
            });
            $('#edit-modal').modal('show');
        },

        showAddModal() {
            $('#add-modal').modal('show');
        }
    },
});