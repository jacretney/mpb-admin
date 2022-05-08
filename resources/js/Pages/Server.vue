<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Server Settings
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Change server settings
                    </div>

                    <div class="form-group px-6 py-3" :key="option.key" v-for="option in formOptions">
                        <Label :value="option.label"/>
                        <Input v-model="form[option.key]" />
                    </div>

                    <Button @click="save">
                        Save
                    </Button>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<script>
import Label from '../Components/Label';
import Input from '../Components/Input';
import Button from '../Components/Button';
import { Inertia } from '@inertiajs/inertia';

export default {
    components: {
        Label,
        Input,
        Button,
    },

    props: {
        serverProperties: {
            type: Array,
            required: true,
        },
    },

    data() {
        return {
            form: {
                'gamemode': this.getDefaultValue('gamemode'),
                'forceGamemode': this.getDefaultValue('forceGamemode'),
                'difficulty': this.getDefaultValue('difficulty'),
                'levelType': this.getDefaultValue('levelType'),
                'serverName': this.getDefaultValue('serverName'),
                'maxPlayers': this.getDefaultValue('maxPlayers'),
                'serverPort': this.getDefaultValue('serverPort'),
                'serverPortV6': this.getDefaultValue('serverPortV6'),
                'levelName': this.getDefaultValue('levelName'),
                'levelSeed': this.getDefaultValue('levelSeed'),
                'onlineMode': this.getDefaultValue('onlineMode'),
                'allowList': this.getDefaultValue('allowList'),
                'allowCheats': this.getDefaultValue('allowCheats'),
                'viewDistance': this.getDefaultValue('viewDistance'),
                'playerIdleTimeout': this.getDefaultValue('playerIdleTimeout'),
                'maxThreads': this.getDefaultValue('maxThreads'),
                'tickDistance': this.getDefaultValue('tickDistance'),
                'defaultPlayerPermissionLevel': this.getDefaultValue('defaultPlayerPermissionLevel'),
                'texturepackRequired': this.getDefaultValue('texturepackRequired'),
                'contentLogFileEnabled': this.getDefaultValue('contentLogFileEnabled'),
                'compressionThreshold': this.getDefaultValue('compressionThreshold'),
                'serverAuthoritativeMovement': this.getDefaultValue('serverAuthoritativeMovement'),
                'playerMovementScoreThreshold': this.getDefaultValue('playerMovementScoreThreshold'),
                'playerMovementActionDirectionThreshold': this.getDefaultValue('playerMovementActionDirectionThreshold'),
                'playerMovementDistanceThreshold': this.getDefaultValue('playerMovementDistanceThreshold'),
                'playerMovementDurationThresholdInMs': this.getDefaultValue('playerMovementDurationThresholdInMs'),
                'correctPlayerMovement': this.getDefaultValue('correctPlayerMovement'),
            },
        }
    },

    computed: {
        formOptions() {
            return [
                {
                    'key': 'gamemode',
                    'label': 'Game mode',
                },
                {
                    'key': 'forceGamemode',
                    'label': 'Force game mode',
                },
                {
                    'key': 'difficulty',
                    'label': 'Difficulty',
                },
                {
                    'key': 'levelType',
                    'label': 'Level type',
                },
                {
                    'key': 'serverName',
                    'label': 'Server name',
                },
                {
                    'key': 'maxPlayers',
                    'label': 'Max Players',
                },
                {
                    'key': 'serverPort',
                    'label': 'Server port',
                },
                {
                    'key': 'serverPortV6',
                    'label': 'Server Port (IPv6)',
                },
                {
                    'key': 'levelName',
                    'label': 'World name',
                },
                {
                    'key': 'levelSeed',
                    'label': 'World seed',
                },
                {
                    'key': 'onlineMode',
                    'label': 'Online mode',
                },
                {
                    'key': 'allowList',
                    'label': 'Allow list',
                },
                {
                    'key': 'allowCheats',
                    'label': 'Allow cheats',
                },
                {
                    'key': 'viewDistance',
                    'label': 'View distance',
                },
                {
                    'key': 'playerIdleTimeout',
                    'label': 'Player idle timeout',
                },
                {
                    'key': 'maxThreads',
                    'label': 'Max threads',
                },
                {
                    'key': 'tickDistance',
                    'label': 'Tick distance',
                },
                {
                    'key': 'defaultPlayerPermissionLevel',
                    'label': 'Default player permission level',
                },
                {
                    'key': 'texturepackRequired',
                    'label': 'Texture pack required?',
                },
                {
                    'key': 'contentLogFileEnabled',
                    'label': 'Content log file enabled?',
                },
                {
                    'key': 'compressionThreshold',
                    'label': 'Compression threshold',
                },
                {
                    'key': 'serverAuthoritativeMovement',
                    'label': 'Server authoritative movement',
                },
                {
                    'key': 'playerMovementScoreThreshold',
                    'label': 'Player movement score threshold',
                },
                {
                    'key': 'playerMovementActionDirectionThreshold',
                    'label': 'Player movement action direction threshold',
                },
                {
                    'key': 'playerMovementDistanceThreshold',
                    'label': 'Player movement distance threshold',
                },
                {
                    'key': 'playerMovementDurationThresholdInMs',
                    'label': 'Player movement duration threshold in ms',
                },
                {
                    'key': 'correctPlayerMovement',
                    'label': 'Correct player movement?',
                },
            ];
        }
    },

    methods: {
        getDefaultValue(key) {
            return this.serverProperties.filter((property) => {
                return property.key === key;
            })[0].value;
        },

        save() {
            this.loading = true;

            Inertia.post('http://localhost/api/server', this.form);
        }
    }
}
</script>