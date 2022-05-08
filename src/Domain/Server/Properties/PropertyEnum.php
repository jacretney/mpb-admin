<?php

namespace Substratum\Domain\Server\Properties;

enum PropertyEnum: string
{
    case Gamemode = 'gamemode';
    case ForceGamemode = 'force-gamemode';
    case Difficulty = 'difficulty';
    case LevelType = 'level-type';
    case ServerName = 'server-name';
    case MaxPlayers = 'max-players';
    case ServerPort = 'server-port';
    case ServerPortV6 = 'server-port-v6';
    case LevelName = 'level-name';
    case LevelSeed = 'level-seed';
    case OnlineMode = 'online-mode';
    case AllowList = 'allow-list';
    case AllowCheats = 'allow-cheats';
    case ViewDistance = 'view-distance';
    case PlayerIdleTimeout = 'player-idle-timeout';
    case MaxThreads = 'max-threads';
    case TickDistance = 'tick-distance';
    case DefaultPlayerPermissionLevel = 'default-player-permission-level';
    case TexturepackRequired = 'texture-pack-required';
    case ContentLogFileEnabled = 'content-log-file-enabled';
    case CompressionThreshold = 'compression-threshold';
    case ServerAuthoritativeMovement = 'server-authoritative-movement';
    case PlayerMovementScoreThreshold = 'player-movement-score-threshold';
    case PlayerMovementActionDirectionThreshold = 'player-movement-action-direction-threshold';
    case PlayerMovementDistanceThreshold = 'player-movement-distance-threshold';
    case PlayerMovementDurationThresholdInMs = 'player-movement-duration-threshold-in-ms';
    case CorrectPlayerMovement = 'correct-player-movement';

    public function getDefault(): mixed
    {
        return match($this) {
            PropertyEnum::Gamemode => 'survival',
            PropertyEnum::ForceGamemode => false,
            PropertyEnum::Difficulty => 'easy',
            PropertyEnum::LevelType => 'DEFAULT',
            PropertyEnum::ServerName => 'Substratum Server',
            PropertyEnum::MaxPlayers => 10,
            PropertyEnum::ServerPort => 19132,
            PropertyEnum::ServerPortV6 => 19133,
            PropertyEnum::LevelName => 'level',
            PropertyEnum::LevelSeed => null,
            PropertyEnum::OnlineMode => true,
            PropertyEnum::AllowList => false,
            PropertyEnum::AllowCheats => false,
            PropertyEnum::ViewDistance => 10,
            PropertyEnum::PlayerIdleTimeout => 30,
            PropertyEnum::MaxThreads => 8,
            PropertyEnum::TickDistance => 4,
            PropertyEnum::DefaultPlayerPermissionLevel => 'member',
            PropertyEnum::TexturepackRequired => false,
            PropertyEnum::ContentLogFileEnabled => false,
            PropertyEnum::CompressionThreshold => 1,
            PropertyEnum::ServerAuthoritativeMovement => true,
            PropertyEnum::PlayerMovementScoreThreshold => 20,
            PropertyEnum::PlayerMovementActionDirectionThreshold => 0.85,
            PropertyEnum::PlayerMovementDistanceThreshold => 0.3,
            PropertyEnum::PlayerMovementDurationThresholdInMs => 500,
            PropertyEnum::CorrectPlayerMovement => false,
        };
    }
}