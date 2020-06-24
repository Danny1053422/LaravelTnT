<template>
    <div>
        <div v-if="loading">Data is loading...</div>
        <div v-else>
            <div class="row mb-4" v-for="row in rows" :key="'row' + row">
                <div
                    class="col d-flex align-items-stretch"
                    v-for="(bookable, columns) in BookableInRows(row)"
                    :key="'columns'+columns"
                >
                    <bookable-list-item
                        v-bind="bookable"
                    ></bookable-list-item>
                </div>
                <div class="col" v-for="p in PlaceHolderInRow(row)" :key="'p'+p"></div>
            </div>
        </div>
    </div>
</template>
<script>
import BookableListItem from "./BookableListItem";
export default {
    components: {
        BookableListItem
    },
    data() {
        return {
            bookables: null,
            loading: false,
            columns: 3
        };
    },
    computed: {
        rows() {
            return this.bookables == null
                ? 0
                : Math.ceil(this.bookables.length / this.columns);
        }
    },
    methods:{
        BookableInRows(row){
            return this.bookables.slice((row - 1) * this.columns,row * this.columns);
        },
        PlaceHolderInRow(row){
            return this.columns - this.BookableInRows(row).length;
        }
    },
    created() {
        this.loading = true;
        const request = axios.get("/api/bookables")
        .then(res => {
            this.bookables = res.data.data;
            this.loading = false;
        })
        .catch(err => {
            console.error(err);
        })
    }
};
</script>
