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

let teachersTable = new Vue({
    el: '#teachers-table',

    methods: {
        showEditModal(username) {
            $.get('/admin/teachers/' + username, function (data) {
                editModal.responses = data[0];
                console.log(data);
            });
            $('#edit-modal').modal('show');
        }
    },
});