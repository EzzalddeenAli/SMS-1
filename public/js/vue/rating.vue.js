new Vue({
    el: "#ratings",
    data: {
        rating: 3,
        mouseOver: null,
    },

    methods: {
        rate(event, teacherId, subjectId) {
            //set csrf token
            axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // console.log("rating = " + event);
            // console.log("teacherId = " + teacherId);
            // console.log("subjectId = " + subjectId);
            axios.post('/student/rate', {
                rating: event,
                teacherId: teacherId,
                subjectId: subjectId,
            })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }

});