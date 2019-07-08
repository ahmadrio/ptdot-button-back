<template>
    <div>
        <div class="mb-3">
            <button-back-and-breadcrumbs/>
        </div>

        <dashboard/>
    </div>
</template>

<script>
    import Dashboard from "@nova/views/Dashboard";

    export default {
        components: {Dashboard},
    }
</script>