<template>
<div>
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
</div>
</template>

<script>
    export default {
        props: {
            level: Object,
        },
    }
</script>
