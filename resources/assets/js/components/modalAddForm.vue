<template>
    <div v-if="formType !== 'select'">
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
    </div>
</template>

<script>
    export default {
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
        }
    }
</script>
