<template>
    <div class="form-group">
        <label>Odaberi firmu:</label>
        <select class="form-select" v-model="selectedLegalEntity" @change="onChangeLegalEntity">
            <option disabled selected>Izaberite firmu</option>
            <option
                v-for="(legalEntity, index) in listLegalEntity"
                :value="legalEntity.id"
                :key="index"
            >
                {{ legalEntity.name }}
            </option>
        </select>
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
                listLegalEntity: [],
                listPosition: [],
                selectedLegalEntity: "",
                selectedPosition: "",
                // name: '',
                // email: '',
                // cv: '',
                // terms_and_conditions: ''
            }
        },


        mounted(){
            this.loadLegalEntities();
            // this.onChangeLegalEntity();
        },

        methods: {
            loadLegalEntities(){
                axios
                    .get(`/api/legalEntities/all`)
                    .then((res) => {
                        this.listLegalEntity = res.data.data;
                    });
            },

            onChangeLegalEntity() {
                axios
                    .get(
                        `/api/positions/${this.selectedLegalEntity}`)
                    .then((res) => {
                        this.listPosition = res.data.data;
                    });
            },

            // loadLegalEntities: function (){
            //     // load API
            //     axios.get('/api/legalEntities')
            //     .then((response) => {
            //         // assign this.legalEntities
            //         this.legalEntities = response.data.data;
            //     })
            //     .catch(function (error){
            //         // catch errors
            //         console.log(error);
            //     });
            //
            // },

            // loadPositions: function (){
            //     // load API
            //     axios.get('/api/positions/all')
            //         .then((response) => {
            //             // assign this.legalEntities
            //             this.positions = response.data.data;
            //         })
            //         .catch(function (error){
            //             // catch errors
            //             console.log(error);
            //         });
            // },

        //     // axios.get('/api/positions/'.LEP.legalEntity.id)
        //     //     .then((response) => {
        //     //         // assign this.legalEntities
        //     //         this.LEP.legalEntity.position = response.data.data;
        //     //     })
        //     //     .catch(function (error){
        //     //         // catch errors
        //     //         console.log(error);
        //     //     });
        // },
        // watch: {
        //     selectedLegalEntity: function() {
        //         // Clear previously selected values
        //         this.positions = [];
        //         this.selectedPosition = "";
        //         // Populate list of positions in the second dropdown
        //         if (this.selectedLegalEntity.length > 0) {
        //             axios.get('/api/positions/'.selectedLegalEntity.id)
        //                 .then((response) => {
        //                     // assign this.legalEntities
        //                     this.positions = response.data.data;
        //                 })
        //                 .catch(function (error){
        //                     // catch errors
        //                     console.log(error);
        //                 });
        //         }
        //     }
        }
    };

</script>


