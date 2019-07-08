<template>
    <div>
        <nav>
            <ul class="button-back-and-breadcrumbs">
                <li class="button-back-item">
                    <button
                        title="Go Back"
                        @click="clickButtonBack">
                        <span>
                            <icon
                                type="arrow-left"
                                style="margin-left: 0px; display: -webkit-box;"
                            />
                        </span>
                    </button>
                </li>

                <li class="breadcrumb-item" v-for="crumb in crumbs" v-if="crumbs.length > 0 && crumb.text !== false">
                    <router-link :to="crumb.to">{{ __(crumb.text) }}</router-link>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
    export default {

        props: [
            'headingTitle',
            'resource',
            'resourceName',
            'relatedResourceLabel',
            'selectedResource',
            'singularName',

            'viaResource',
            'viaResourceId',
            'viaRelationship',

            'customToolTitle',
        ],

        data() {
            return {
                isMounted: false,
            };
        },

        computed: {
            crumbs: function () {
                if (!this.isMounted)
                    return;

                let pathArray = this.$router.currentRoute.path.split('/').filter(function (e) { return e });
                pathArray.unshift('');
                console.log(this.$router.currentRoute);

                const breadcrumbArray = pathArray.reduce((breadcrumbArray, path, idx) => {
                    breadcrumbArray.push({
                        path: path,
                        to: (breadcrumbArray[idx - 1] ? (breadcrumbArray[idx - 1].to === '/' ? '' : breadcrumbArray[idx - 1].to) : '') + "/" + path,
                        text: this.breadcrumbLabel(path, idx),
                    });

                    return breadcrumbArray;
                }, []);

                console.log(typeof this.viaResource);
                if (typeof this.viaResource !== 'undefined' && this.viaResource !== '') {
                    let pathQueries = {
                        path: this.viaResource,
                        to: '/resources/' + this.viaResource + '/' + this.viaResourceId,
                        text: this.viaResource.charAt(0).toUpperCase() + this.viaResource.slice(1) + ' Detail',
                    };
                    console.log(pathQueries);
                    if (pathQueries.path !== '')
                        breadcrumbArray.splice(2, 0, pathQueries);
                }

                console.log(breadcrumbArray);
                return breadcrumbArray;
            }
        },

        mounted() {
            this.isMounted = true;
        },

        methods: {
            breadcrumbLabel: function(path, idx) {
                if (['resources', 'attach', 'edit-attached'].includes(path) || idx === 5) {
                    return false;
                } else if (path === '') {
                    return this.__('Home');
                } else if (typeof this.resource !== 'undefined' && this.resource !== null) {
                    if (parseInt(path) === this.resource.id.value) {
                        return this.resource.title;
                    } else if (typeof this.selectedResource !== 'undefined' && this.selectedResource !== null && path === this.selectedResource.value) {
                        return this.selectedResource.display;
                    } else if (idx < 4) {
                        return this.resource.label;
                    } else if (idx >= 4) {
                        return path.replace('-', ' ').replace(/(?:^|\s)\S/g, function (a) {
                            return a.toUpperCase();
                        });
                    }

                } else if (typeof this.relatedResourceLabel !== 'undefined' && this.relatedResourceLabel !== null) {
                    return this.relatedResourceLabel;
                } else if (typeof this.headingTitle !== 'undefined' && this.headingTitle !== null) {
                    return this.headingTitle;
                }
                else if (typeof this.singularName !== 'undefined' && this.singularName !== null) {
                    if (idx >= 3) {
                        return path.replace('-', ' ').replace(/(?:^|\s)\S/g, function (a) {
                            return a.toUpperCase();
                        });
                    }
                    return this.singularName;
                }
                return this.customToolTitle ? this.customToolTitle : '...';
            },

            clickButtonBack: () => {
                return window.history.go(-1);
            }
        },

    }
</script>