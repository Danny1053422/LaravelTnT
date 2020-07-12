<template>
    <div>
        <div class="form-group">
            <label class="text-muted"
                >Select the star rating (1 is worst - 5 is best)</label
            >
            <star-rating v-model="review.rating" class="fa-3x"></star-rating>
        </div>
        <div class="form-group">
            <label for="content" class="text-muted"
                >Describe your experience with</label
            >
            <textarea
                name="content"
                cols="30"
                rows="10"
                class="form-control"
                v-model="review.content"
            ></textarea>
        </div>
        <button class="btn btn-lg btn-primary btn-block">Submit</button>
    </div>
</template>
<script>
export default {
    data() {
        return {
            review: {
                rating: null,
                content: null
            },
            existingReview: null
        };
    },
    created() {
        axios({
            method: "get",
            url: "api/reviews",
            data: {
                id: this.route.params.id
            }
        })
            .then(res => {
                this.existingReview = res.data.data;
            })
            .catch(err => {
                console.error(err);
            });
    }
};
</script>
