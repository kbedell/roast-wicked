<template>
    <div class="text-center">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-xs-12">
            <div v-show="showLoader" class="col-xs-2 col-xs-offset-5">
                <i class="fa fa-spinner fa-spin fa-5x" style="color: black;"></i>
            </div>
            <div class="row"
                v-for="i in Math.ceil(orderedGenres.length / rowItems)"
                v-bind:key="i"
                v-bind:class="{ 'content-to-hide': i > 4 && !showMore }">
                <div class="col-md-4 col-md-offset-0 col-xs-10 col-xs-offset-1"
                    v-for="genre in orderedGenres.slice((i - 1) * rowItems, i * rowItems)"
                    v-bind:key="genre.id">
                    <div class="list-group selectGenreMarginBottom">
                        <genre-preference v-bind:genre="genre"/>
                    </div>
                </div>
            </div>

            <div class="hidden-md hidden-lg col-xs-10 col-xs-offset-1" v-show="!showLoader">
                <span class="hidden-md hidden-lg col-xs-10 col-xs-offset-1 more-toggle-size" v-on:click="toggleShowMore()">
                    <template v-if="!showMore">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Show More
                    </template>
                    <template v-else>
                        <i class="fa fa-minus-circle" aria-hidden="true"></i> Show Less
                    </template>
                </span>
            </div>
            <div class="col-xs-4 col-xs-offset-4" style="margin-top:5px;" v-show="!showLoader">
                <a href="/users/claim-first-book" class="btn btn-block btn-teal">Continue</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            recipes: [],
            showLoader: true,
            showMore: false
        };
    },
    mounted() {
        this.loadRecipes();
    },
    methods: {
        loadRecipes: function() {
            this.showLoader = true;
            axios({
                method: 'GET',
                url: process.env.MIX_API_URL + '/api/recipes',
                withCredentials: true,
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(res => {
                this.recipes = res.data;
                this.showLoader = false;

            })
            .catch(err => {
                console.error(err);
            });
        },
        toggleShowMore: function() {
            this.showMore = !this.showMore;
        }
    }
}
</script>

<style scoped>
    @media (max-width: 767px) {
        .content-to-hide {
            display: none;
        }
    }
    .more-toggle-size {
        font-size: 18px;
    }
</style>


