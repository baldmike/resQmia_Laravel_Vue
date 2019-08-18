<template>
  <b-container fluid>
    <b-row class="my-1" v-for="type in form" :key="type">
      <b-col sm="3">
        <label :for="`type-${type}`">{{ type }}:</label>
      </b-col>
      <b-col sm="9">
        <b-form-input :id="`type-${type}`" :type="text"></b-form-input>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
  export default {
    data() {
      return {
        form: [
          'name',
          'species',
          'weight',
          'status',
          'date_of_birth',
          'exam',
          'deworming_1',
          'deworming_2',
          'fecal_test',
          'heartworm_test',
          'heartworm_result',
          'spay/neuter',
          'distemper_1',
          'distemper_2',
          'distemper_3',
          'lepto_1',
          'lepto_2',
          'bord',
          'civ',
          'civ_booster',
          'rabies',
          'rabies_number',
          'vet',
          'microchip',
          'heartworm',
          'flea_tick',
        ]
      }
    }
  }
</script>