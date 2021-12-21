<template>
    <div class="field">
        <label class="label">Choose type for save feedback form</label>
        <div class="control" v-for="type in $props.types">
            <label>
                <input type="radio" :value="type" v-model="value"/>
                {{ type }}
            </label>
            <br>
        </div>
        <button @click="save">Save</button>
    </div>
</template>

<script>
export default {
    name: "SettingsForm",
    props: ['types', 'curtype'],
    data() {
        return {
            value: this.$props.curtype ? this.$props.curtype : this.$props.types[0],
        }
    },
    methods: {
        save() {
            axios.post('/save-settings', { value: this.value }).then((response) => {
                alert('Настройки успешно сохранены');
            }).catch((e) => {
                console.log(e)
            });
        }
    }
}
</script>

<style scoped>
.field {
    font-family: 'Nanito', sans-serif;
    font-size: 16px;
    margin: 0 auto;
    max-width: 600px;
    width: 100%;
}
</style>
