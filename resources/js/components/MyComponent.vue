<template>
    <div class="container">
        <p>{{msg}}</p>
        <hr />
        <ul>
            <li v-for="(person) in people" :key="person.id">
                {{person.id}}: {{person.name}} [{{person.mail}}] ({{person.age}})
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted(){
            axios.get('/hello/json').then(response => {
                this.people = response.data;
                this.msg = 'get data!';
            });
        },
        data:function(){
            return {
                msg: 'wait...',
                name: '',
                people: []
            };
        }
    }
</script>
