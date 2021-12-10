<template>
    <div class="form-group">
        <label>Odaberi poziciju:</label>
        <select class="form-select" :disabled="listPosition.length == 0" v-model="selectedPosition">
            <option disabled selected>Izaberite poziciju</option>
            <option
                v-for="(position, index) in listPosition"
                :key="index"
                :value="position.id"
            >
                {{ position.title }}
            </option>
        </select>
    </div>
</template>

<script>
    export default {
        data: function (){
            return{
                test: window.location.pathname.substring(1),
                leParam: '',
                listPosition: [],
                selectedPosition: ""
            }
        },

        mounted(){
            this.loadPositions();
            // this.getLegalEntityId();
        },

        methods: {
            loadPositions() {
                axios
                    .get(
                        `/api/positions/2`
                    )
                    .then((res) => {
                        this.listPosition = res.data.data;
                    });
            },
            // async getLegalEntityId(){
            //     axios
            //         .get(
            //             `/api/legalEntities/${window.location.pathname.substring(1)}`
            //         )
            //         .then((res) => {
            //             this.leParam = res.data.data[0]['id'];
            //         });
            // },
            // getLegalEntityId(){
            //     axios
            //         .get(
            //             `/api/legalEntities/2`
            //         )
            //         .then((res) => {
            //             this.leParam = res.data.data[0]['id'];
            //         });
            // },
        }
    };

</script>


