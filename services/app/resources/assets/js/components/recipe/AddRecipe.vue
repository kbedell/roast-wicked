<template>
    <div class="recipe-form">
        <div class="form-field">
            <div class="form-label">
                Recipe Name
            </div>
            <input v-model.trim="name" id="name" placeholder="">
        </div>

        <div class="form-field">
            <div class="form-label">
                Ingredients
            </div>
            <div class="form-explanation">
                Add one ingredient per a line. You can use square brackets to add headings. e.g. [For Sauce]
            </div>
            <textarea v-model.trim="ingredients" placeholder="" class="ingredients-input"></textarea>
        </div>

        <div class="form-field">
            <div class="form-label">
                Steps
            </div>
            <div class="steps" v-for="(row, index) in steps" v-bind:key="row.index">
                <textarea v-model.trim="row.step"></textarea>
                <div class="remove-button">
                    <a v-on:click="removeElement(index);" style="cursor: pointer"><i class="fas fa-times"></i></a>
                </div>
            </div>
            <button class="btn btn-primary" type="button" v-on:click="addStep" v-on:submit.prevent="onSubmit">Add Step</button>
        </div>

        <div class="form-field">
            <button class="btn btn-primary" type="button" v-on:click="addRecipe">Add Recipe</button>
        </div>
    </div>
</template>

<script type="text/javascript">
    export default {
        data: function() {
            return {
                steps: [{step: ""}],
                name: "",
                ingredients: ""
            }
        },
        methods: {
            addStep: function() {
                var elem = document.createElement('div');
                this.rows.push({
                    step: ""
                });
            },
            removeElement: function(index) {
                this.rows.splice(index, 1);
            },
            addRecipe: function() {
                axios({
                    method: 'POST',
                    url: process.env.MIX_API_SERVICE_URL + '/recipe',
                    withCredentials: true,
                    params: params,
                    headers: {
                        'Accept': 'application/json'
                    },
                    data: {
                        'name': this.name,
                        'ingredients': this.ingredients,
                        'steps': this.rows
                    }
                })
                .then((res) => {

                })
                .catch((err) => {
                    console.error(err);
                })
            }
        }
    };
</script>