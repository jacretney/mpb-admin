<?php

namespace Substratum\Domain\Server\Properties;

enum PropertyEnum: string
{
    case Gamemode = 'gamemode';
    case ForceGamemode = 'forceGamemode';
    case Difficulty = 'difficulty';
    case LevelType = 'levelType';
    case ServerName = 'serverName';
    case MaxPlayers = 'maxPlayers';
    case ServerPort = 'serverPort';
    case ServerPortV6 = 'serverPortV6';
    case LevelName = 'levelName';
    case LevelSeed = 'levelSeed';
    case OnlineMode = 'onlineMode';
    case AllowList = 'allowList';
    case AllowCheats = 'allowCheats';
    case ViewDistance = 'viewDistance';
    case PlayerIdleTimeout = 'playerIdleTimeout';
    case MaxThreads = 'maxThreads';
    case TickDistance = 'tickDistance';
    case DefaultPlayerPermissionLevel = 'defaultPlayerPermissionLevel';
    case TexturepackRequired = 'texturepackRequired';
    case ContentLogFileEnabled = 'contentLogFileEnabled';
    case CompressionThreshold = 'compressionThreshold';
    case ServerAuthoritativeMovement = 'serverAuthoritativeMovement';
    case PlayerMovementScoreThreshold = 'playerMovementScoreThreshold';
    case PlayerMovementActionDirectionThreshold = 'playerMovementActionDirectionThreshold';
    case PlayerMovementDistanceThreshold = 'playerMovementDistanceThreshold';
    case PlayerMovementDurationThresholdInMs = 'playerMovementDurationThresholdInMs';
    case CorrectPlayerMovement = 'correctPlayerMovement';

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

    public static function fromValue(string $value): static
    {
        return match(true) {
            $value === PropertyEnum::Gamemode->value => self::Gamemode,
            $value === PropertyEnum::ForceGamemode->value => self::ForceGamemode,
            $value === PropertyEnum::Difficulty->value => self::Difficulty,
            $value === PropertyEnum::LevelType->value => self::LevelType,
            $value === PropertyEnum::ServerName->value => self::ServerName,
            $value === PropertyEnum::MaxPlayers->value => self::MaxPlayers,
            $value === PropertyEnum::ServerPort->value => self::ServerPort,
            $value === PropertyEnum::ServerPortV6->value => self::ServerPortV6,
            $value === PropertyEnum::LevelName->value => self::LevelName,
            $value === PropertyEnum::LevelSeed->value => self::LevelSeed,
            $value === PropertyEnum::OnlineMode->value => self::OnlineMode,
            $value === PropertyEnum::AllowList->value => self::AllowList,
            $value === PropertyEnum::AllowCheats->value => self::AllowCheats,
            $value === PropertyEnum::ViewDistance->value => self::ViewDistance,
            $value === PropertyEnum::PlayerIdleTimeout->value => self::PlayerIdleTimeout,
            $value === PropertyEnum::MaxThreads->value => self::MaxThreads,
            $value === PropertyEnum::TickDistance->value => self::TickDistance,
            $value === PropertyEnum::DefaultPlayerPermissionLevel->value => self::DefaultPlayerPermissionLevel,
            $value === PropertyEnum::TexturepackRequired->value => self::TexturepackRequired,
            $value === PropertyEnum::ContentLogFileEnabled->value => self::ContentLogFileEnabled,
            $value === PropertyEnum::CompressionThreshold->value => self::CompressionThreshold,
            $value === PropertyEnum::ServerAuthoritativeMovement->value => self::ServerAuthoritativeMovement,
            $value === PropertyEnum::PlayerMovementScoreThreshold->value => self::PlayerMovementScoreThreshold,
            $value === PropertyEnum::PlayerMovementActionDirectionThreshold->value => self::PlayerMovementActionDirectionThreshold,
            $value === PropertyEnum::PlayerMovementDistanceThreshold->value => self::PlayerMovementDistanceThreshold,
            $value === PropertyEnum::PlayerMovementDurationThresholdInMs->value => self::PlayerMovementDurationThresholdInMs,
            $value === PropertyEnum::CorrectPlayerMovement->value => self::CorrectPlayerMovement,
        };
    }
}