<template>
    <div class="body">
        <b-row>
            <b-col cols="12" md="4">
                <b-form-checkbox v-model="filterDogs">Dogs</b-form-checkbox>
                <b-form-checkbox v-model="filterCats">Cats</b-form-checkbox>
            </b-col>
            <b-col cols="12" md="4">
                <div class="my-3">
                    <input class="search-bar" type="text" v-model="search" placeholder="Search By Name">
                </div>
            </b-col>
        </b-row>
        <b-row>
            <b-col v-for="(animal, index) in filteredAnimals"
                    :key="index" cols="6" md="4" lg="2">
                <b-card v-if="animal.profile" :img-src="'http://localhost:8000/storage/' + animal.image"  @click="showSelectedAnimalModal(animal)" animal="'animal.id'" img-alt="Selected animal image" class="animal-card">
                    <b-btn class="select-button" >{{ animal.name }}</b-btn>
                    <!-- <b-btn class="select-button" @click="showUpdateAnimalModal(animal)" animal="'animal.id'">Update</b-btn> -->
                </b-card>
                <b-card v-else :img-src="'https://source.unsplash.com/random'" fluid-grow img-alt="No Selected animal image" class="animal-card">
                    <b-btn class="select-button" @click="showSelectedAnimalModal(animal)" animal="'animal.id'">{{ animal.name }}</b-btn>
                    <!-- <b-btn class="select-button" @click="showUpdateAnimalModal(animal)" animal="'animal.id'">Update</b-btn> -->
                </b-card>
                
            </b-col>
        </b-row>

        <div>
            <!-- Show Animal Modal Component -->
            <b-modal ref="selectedAnimalModal" :animal="'animal'" ok-only ok-title="Close" ok-variant="dark">
                <h4 class="my-2">{{ selectedAnimal.name }}, {{ selectedAnimal.species }}, {{ selectedAnimal.weight }} pounds</h4>
                

                <b-row>
            <b-col sm="2" offset="1">
                <label>Name:</label>
            </b-col>
            <b-col sm="9">
                <b-form-input 
                        type="text" 
                        v-model="$v.form1.name.$model"
                        :state="!$v.form1.name.$invalid"
                        aria-describedby="name-live-feedback"></b-form-input>
            </b-col>
        </b-row>

        <b-row>
            <b-col sm="2" offset="1">
                <label>Species:</label>
            </b-col>
            <b-col sm="9">
                <b-form-input 
                        type="text" 
                        v-model="$v.form1.species.$model"
                        :state="!$v.form1.species.$invalid"
                        aria-describedby="species-live-feedback"></b-form-input>
            </b-col>
        </b-row>

        <b-row>
            <b-col sm="2" offset="1">
                <label>Status:</label>
            </b-col>
            <b-col sm="9">
                <b-form-select :state="!$v.form1.status.$invalid" v-model="form1.status" :options="statusOptions"></b-form-select>
            
            </b-col>
        </b-row>

        <b-row>
            <b-col sm="2" offset="1">
                <label>Weight:</label>
            </b-col>
            <b-col sm="9">
                <b-form-input 
                        type="number"
                        v-model="$v.form1.weight.$model"
                        :state="!$v.form1.weight.$invalid"
                        aria-describedby="species-live-feedback"></b-form-input>
            </b-col>
        </b-row>

        <b-row>
            <b-col sm="2" offset="1">
                <label>Date of Birth:</label>
            </b-col>
            <b-col sm="9">
                <b-form-input 
                        type="date"
                        v-model="$v.form1.date_of_birth.$model"
                        :state="!$v.form1.date_of_birth.$invalid"
                        aria-describedby="species-live-feedback"></b-form-input>
            </b-col>
        </b-row>
                <b-row class="my-1" v-for="(value, key) in form2" :key="key">
                    <b-col sm="2">
                        <label>{{ key }}:</label>
                    </b-col>
                    <b-col sm="10">
                        <b-form-input type="text" v-model="form2[key]"></b-form-input>
                    </b-col> 
                </b-row>
                <!-- <li class="my-4">Added to Alive!: {{ selectedAnimal.created_at | moment("dddd, MMMM Do YYYY")}}</li>

                <li class="my-4">Status: {{ selectedAnimal.status }}</li>
                
                <li class="my-4">Date of Birth: {{ selectedAnimal.date_of_birth }}</li>

                <li class="my-4">Vet Exam Info: {{ selectedAnimal.exam }}</li>

                <li class="my-4">Deworming 1: {{ selectedAnimal.deworming_1 }}</li>

                <li class="my-4">Deworming 2: {{ selectedAnimal.deworming_2 }}</li>

                <li class="my-4">Fecal Test: {{ selectedAnimal.fecal_test }}</li>

                <li class="my-4">Heartworm Test: {{ selectedAnimal.heartworm_test }}</li>

                <li class="my-4">Heartworm Result: {{ selectedAnimal.heartworm_result }}</li>

                <li class="my-4">Spay/Neuter: {{ selectedAnimal.spay_neuter }}</li>

                <li class="my-4">Distemper 1: {{ selectedAnimal.distemper_1 }}</li>

                <li class="my-4">Distemper 2: {{ selectedAnimal.distemper_2 }}</li>

                <li class="my-4">Distemper 3: {{ selectedAnimal.distemper_3 }}</li>

                <li class="my-4">Lepto 1: {{ selectedAnimal.lepto_1 }}</li>

                <li class="my-4">Lepto 2: {{ selectedAnimal.lepto_2 }}</li>

                <li class="my-4">Bordatella: {{ selectedAnimal.bord }}</li>

                <li class="my-4">Canine Flu: {{ selectedAnimal.civ }}</li>

                <li class="my-4">Canine Flu Booster: {{ selectedAnimal.civ_booster }}</li>

                <li class="my-4">Rabies: {{ selectedAnimal.rabies }}</li>

                <li class="my-4">Rabies Number: {{ selectedAnimal.rabies_number }}</li>

                <li class="my-4">Vet Info: {{ selectedAnimal.vet }}</li>

                <li class="my-4">Microchip: {{ selectedAnimal.microchip }}</li>

                <li class="my-4">Heartworm Prevention: {{ selectedAnimal.heartworm }}</li>
                
                <li class="my-4">Flea & Tick Prevention: {{ selectedAnimal.flea_tick }}</li> -->

            </b-modal>
        </div>

        <div>
            <!-- Update Animal Modal Component -->
            <b-modal ref="updateAnimalModal" :animal="'animal'" ok-only ok-title="Close" ok-variant="dark">
                <h1>this is the UPDATE modal</h1>
                <input type="text"
                        v-model="selectedAnimal.name">
                <li class="my-4">From {{ selectedAnimal.source }} on {{ selectedAnimal.created_at | moment("dddd, MMMM Do YYYY")}}</li>
                <div class="my-4">{{ selectedAnimal.description }}</div>

            </b-modal>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from "vuex";
    import { validationMixin } from "vuelidate";
    import { helpers, required, minLength, maxLength, minValue, maxValue, email, between, sameAs } from "vuelidate/lib/validators";

    export default {
        name: 'animal',
        data() {
            return {

                form1: {
                    name: '',
                    species: '',
                    weight: '',
                    status: '',
                    date_of_birth: ''
                },

                form2: {
                
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
                },

                statusOptions: [
                    { value: null, text: 'Please select an option' },
                    { value: 'foster', text: 'In foster' },
                    { value: 'adoption_center', text: 'Adoption center' },
                    { value: 'vet', text: 'Hospitalized' },
                    { value: 'other', text: 'Somewhere else?' }
                ],
                
                name: '',
                animal: '',
                search: '',
                selectedAnimal: '',
                filterDogs: false,
                filterCats: false,
                dogs: []


                
            }
        },

        mixins: [
            validationMixin
        ],
         validations: {

            form1: {
                name: {
                    required,
                    minLength: minLength(3)
                },
                species: {
                    required,
                    minLength: minLength(3)
                },
                status: {
                    required,
                    minLength: minLength(3)
                },
                date_of_birth: {
                    required,                    
                },
                weight: {
                    required
                },
            },
        },

        computed: {
            filteredAnimals() {
                let self=this;
                let results = [];

                let allDogs = this.dogs;

                if (this.filterDogs) {
                    allDogs = this.dogs.filter(animal => animal.species.toLowerCase() === 'dog')
                }

                if (this.filterCats) {
                    allDogs = this.dogs.filter(animal => animal.species.toLowerCase() === 'cat')
                }

                if (this.search) {
                    return this.dogs.filter(animal => animal.name.toLowerCase().indexOf(self.search.toLowerCase())>=0);
                }
                
                return allDogs;
                
            },

        ...mapGetters(['isAuthenticated', 'currentUser'])},
        methods: {
            showSelectedAnimalModal (item) {

                this.form1.name = item.name;
                this.form1.species = item.species;
                this.form1.weight = item.weight;
                this.form1.status = item.status;
                this.form1.date_of_birth = item.date_of_birth;
                

                this.form2.exam = item.exam;
                this.form2.deworming_1 = item.deworming_1;
                this.form2.deworming_2 = item.deworming_2;
                this.form2.fecal_test = item.fecal_test;
                this.form2.heartworm_test = item.heartworm_test;
                this.form2.heartworm_result = item.heartworm_result;
                this.form2.spay_neuter = item.spay_neuter;
                this.form2.distemper_1 = item.distemper_1;
                this.form2.distemper_2 = item.distemper_2;
                this.form2.distemper_3 = item.distemper_3;
                this.form2.lepto_1 = item.lepto_1;
                this.form2.lepto_2 = item.lepto_2;
                this.form2.bord = item.bord;
                this.form2.civ = item.civ;
                this.form2.civ_booster = item.civ_booster;
                this.form2.rabies = item.rabies,
                this.form2.rabies_number = item.rabies_number;
                this.form2.vet = item.vet;
                this.form2.microchip = item.microchip;
                this.form2.heartworm = item.heartworm;
                this.form2.flea_tick = item.flea_tick;

                this.selectedAnimal = item;
                this.$refs.selectedAnimalModal.show()
            },
            hideModal () {
                this.$refs.selectedAnimalModal.hide()
                this.$refs.updateAnimalModal.hide()
            },
            showAll() {
                this.$router.push('animals')
            },
            deleteAnimal() {
                
            },
        },

        created() {
            axios.get('/api/dogs').then((dogs) => {
                this.dogs = dogs.data.data;
            })
        }
    }
</script>

<style scoped>

    .body {
        padding: 20px;
    }
    .btn {
        text-align: center;
        /* width: 24%; */
    }
    .center {
        text-align: center;
    }
    .search-bar {
        width: 100%;
        text-align: center;
    }
    .select-button {
        width: 100%;
        margin-bottom: 20px;
        font-size: 10%;
    }
    .filter-button {
        width: 24%;
    }
    .animal-card {
        margin-bottom: 20px;
        padding: .6rem;
    }
    .card-img {
        height: 12rem;
    }
</style>
