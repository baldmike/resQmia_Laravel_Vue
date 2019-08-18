<template>
    <div class="body">
        <b-row>
            <b-col cols="12" md="4">
                <!-- <b-form-checkbox v-model="filterDogs">Dogs</b-form-checkbox>
                <b-form-checkbox v-model="filterCats">Cats</b-form-checkbox> -->
            </b-col>
            <b-col cols="12" md="4">
                <div class="my-3">
                    <input class="search-bar" type="text" v-model="search" placeholder="Search">
                </div>
            </b-col>
        </b-row>
        <b-row>
            <b-col v-for="(animal, index) in filteredAnimals"
                    :key="index" cols="6" md="4" lg="2">
                <b-card v-if="animal.profile" :img-src="'http://localhost:8000/storage/' + animal.image"  @click="showSelectedAnimalModal(animal)" animal="'animal.id'" img-alt="Selected animal image" class="animal-card">
                    <b-btn class="select-button" >{{ animal.name }}</b-btn>
                    <b-btn class="select-button" @click="showUpdateAnimalModal(animal)" animal="'animal.id'">Update</b-btn>
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
                <h1 class="my-2">{{ selectedAnimal.name }}</h1>
                <li class="my-4">{{ selectedAnimal.weight }} pounds</li>
                <li class="my-4">From {{ selectedAnimal.source }} on {{ selectedAnimal.created_at | moment("dddd, MMMM Do YYYY")}}</li>
                <div class="my-4">{{ selectedAnimal.description }}</div>

                <b-btn @click="deleteAnimal">Delete</b-btn>
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

    export default {
        name: 'animal',
        data() {
            return {
                
                name: '',
                animal: '',
                search: '',
                selectedAnimal: '',
                filterDogs: false,
                filterCats: false,
                filterRabbits: false,
                dogs: []
                
            }
        },
        computed: {
            filteredAnimals() {
                let self=this;
                let results = [];

                let allDogs = this.dogs;

                if (this.filterDogs) {
                    allDogs = this.dogs.filter(animal => animal.species === 'dog')
                }

                // if (this.filterCats) {
                //     allDogs = this.dogs.filter(animal => animal.species === 'cat')
                // }
            
                // if (this.filterRabbits) {
                //     allAnimals = this.$store.state.animals.filter(animal => animal.species === 'rab')
                // }

                if (this.search) {
                    return this.dogs.filter(animal => animal.name.toLowerCase().indexOf(self.search.toLowerCase())>=0);
                }
                
                return allDogs;
                
            },
        ...mapGetters(['isAuthenticated', 'currentUser', 'getAnimals'])},
        methods: {
            showSelectedAnimalModal (item) {
                this.selectedAnimal = item;
                this.$refs.selectedAnimalModal.show()
            },
            showUpdateAnimalModal (item) {
                this.selectedAnimal = item;
                this.$refs.updateAnimalModal.show()
            },
            hideModal () {
                this.$refs.selectedAnimalModal.hide()
                this.$refs.updateAnimalModal.hide()
            },
            showAll() {
                this.$router.push('dashboard')
            },
            deleteAnimal() {
                
            },
        },

        created() {
            axios.get('/api/dogs').then((dogs) => {
                this.dogs = dogs.data.data;
                console.log(dogs.data.data);
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
