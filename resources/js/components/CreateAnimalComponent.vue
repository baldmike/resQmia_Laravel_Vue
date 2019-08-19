<template>
  <b-container fluid>
    <b-row class="my-1" v-for="(value, key) in form" :key="key">
      <b-col sm="3">
        <label>{{ key }}:</label>
      </b-col>
      <b-col sm="9">
        <b-form-input type="text" v-model="form[key]"></b-form-input>
      </b-col>  
    </b-row>

    <b-button @click='createAnimal'>Submit</b-button>
    
  </b-container>
</template>

<script>
  export default {
    data() {
      return {
        form: {
          name: 'Joe',
          species: '',
          weight: '',
          status: '',
          date_of_birth: '',
          exam: '',
          deworming_1: '',
          deworming_2: '',
          fecal_test: '',
          heartworm_test: '',
          heartworm_result: '',
          spay_neuter: '',
          distemper_1: '',
          distemper_2: '',
          distemper_3: '',
          lepto_1: '',
          lepto_2: '',
          bord: '',
          civ: '',
          civ_booster: '',
          rabies: '',
          rabies_number: '',
          vet: '',
          microchip: '',
          heartworm: '',
          flea_tick: ''
        }
      }
    },

    methods: {
         createAnimal() {

            let formData = new FormData();
             
            console.log('BEFORE FORM DATA');
            
            formData.append("name", this.form.name);
            formData.append("species", this.form.species);
            formData.append("status", this.form.status);
            // Object.keys(this.form).forEach(key => {
            //     formData.append(key, this.form[key])
            // })

            console.log("FORM DATA ------->")
            console.log(formData);

            axios.post("/api/dogs", formData, {headers: {'Content-Type': 'multipart/form-data'}}).then(({data}) => {
                
                this.$notify({
                    group: 'notifications',
                    title: 'Success',
                    text: this.form.name + ' added',
                    duration: '6000',
                    width: '100%'
                });
                    
                    console.log("CreateAnimalComponent -- createAnimal -- createAnimal()" + data.toString());
                }).catch((error) => {
                    console.log(error);
                })

                this.$store.dispatch('getAllAnimals');
                this.$router.push('/animals');
                
            },
    }
  }
</script>