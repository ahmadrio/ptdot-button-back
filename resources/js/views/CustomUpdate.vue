<template>
    <loading-view :loading="loading">

        <div class="mb-3">
            <button-back-and-breadcrumbs
                :resource="resource"
                :viaResource="viaResource"
                :viaResourceId="viaResourceId"
                :viaRelationship="viaRelationship"
            />
        </div>

        <update
            :resourceName="resourceName"
            :resourceId="resourceId"
            :viaResource="viaResource"
            :viaResourceId="viaResourceId"
            :viaRelationship="viaRelationship"
        />
    </loading-view>
</template>

<script>
    import Update from '@nova/views/Update'
    import FetchResource from "../mixins/FetchResource";

    export default {
        components: {Update},

        mixins: [Update, FetchResource],

        data: () => ({
            resource: null,
        }),

        mounted() {
            this.getResource()
        },
    }
</script>
