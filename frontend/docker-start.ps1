WARN[0000] The "DB_PASSWORD" variable is not set. Defaulting to a blank string.
WARN[0000] The "REDIS_PASSWORD" variable is not set. Defaulting to a blank string.
WARN[0000] The "REDIS_PASSWORD" variable is not set. Defaulting to a blank string.
WARN[0000] The "MINIO_ACCESS_KEY" variable is not set. Defaulting to a blank string.
WARN[0000] The "MINIO_SECRET_KEY" variable is not set. Defaulting to a blank string.
WARN[0000] The "MINIO_ACCESS_KEY" variable is not set. Defaulting to a blank string.
WARN[0000] The "MINIO_SECRET_KEY" variable is not set. Defaulting to a blank string.
WARN[0000] The "JWT_ADMIN_SECRET" variable is not set. Defaulting to a blank string.
WARN[0000] The "CORS_ORIGIN" variable is not set. Defaulting to a blank string.
WARN[0000] The "JWT_REFRESH_SECRET" variable is not set. Defaulting to a blank string.
WARN[0000] The "MINIO_SECRET_KEY" variable is not set. Defaulting to a blank string.
WARN[0000] The "REDIS_PASSWORD" variable is not set. Defaulting to a blank string.
WARN[0000] The "DB_PASSWORD" variable is not set. Defaulting to a blank string.
WARN[0000] The "JWT_SECRET" variable is not set. Defaulting to a blank string.
WARN[0000] The "MINIO_ACCESS_KEY" variable is not set. Defaulting to a blank string.
slms-postgres-prod  |
slms-postgres-prod  | PostgreSQL Database directory appears to contain a database; Skipping initialization
slms-postgres-prod  |
slms-postgres-prod  | 2026-03-03 03:32:58.969 UTC [1] LOG:  starting PostgreSQL 16.13 (Debian 16.13-1.pgdg13+1) on x86_64-pc-linux-gnu, compiled by gcc (Debian 14.2.0-19) 14.2.0, 64-bit
slms-postgres-prod  | 2026-03-03 03:32:58.970 UTC [1] LOG:  listening on IPv4 address "0.0.0.0", port 5432
slms-postgres-prod  | 2026-03-03 03:32:58.970 UTC [1] LOG:  listening on IPv6 address "::", port 5432
slms-postgres-prod  | 2026-03-03 03:32:58.973 UTC [1] LOG:  listening on Unix socket "/var/run/postgresql/.s.PGSQL.5432"
slms-minio-prod     | MinIO Object Storage Server
slms-minio-prod     | Copyright: 2015-2026 MinIO, Inc.
slms-minio-prod     | License: GNU AGPLv3 - https://www.gnu.org/licenses/agpl-3.0.html
slms-minio-prod     | Version: RELEASE.2025-09-07T16-13-09Z (go1.24.6 linux/amd64)
slms-minio-prod     |
slms-minio-prod     | API: http://172.20.0.4:9000  http://127.0.0.1:9000
slms-minio-prod     | WebUI: http://172.20.0.4:9001 http://127.0.0.1:9001
slms-minio-prod     |
slms-minio-prod     | Docs: https://docs.min.io
slms-minio-init-prod  | Added `slms` successfully.
slms-minio-init-prod  | Bucket created successfully `slms/slms-docs`.
slms-minio-init-prod  | Bucket ready
slms-minio-init-prod  | Added `slms` successfully.
slms-minio-init-prod  | Bucket created successfully `slms/slms-docs`.
slms-minio-init-prod  | Bucket ready
slms-minio-init-prod  | Added `slms` successfully.
slms-minio-init-prod  | Bucket created successfully `slms/slms-docs`.
slms-minio-init-prod  | Bucket ready
slms-postgres-prod    | 2026-03-03 03:32:58.978 UTC [28] LOG:  database system was shut down at 2026-03-03 03:32:49 UTC
slms-postgres-prod    | 2026-03-03 03:32:58.984 UTC [1] LOG:  database system is ready to accept connections
slms-postgres-prod    | 2026-03-03 03:33:31.019 UTC [57] LOG:  could not receive data from client: Connection reset by peer
slms-postgres-prod    | 2026-03-03 03:37:59.078 UTC [26] LOG:  checkpoint starting: time
slms-postgres-prod    | 2026-03-03 03:37:59.087 UTC [26] LOG:  checkpoint complete: wrote 3 buffers (0.0%); 0 WAL file(s) added, 0 removed, 0 recycled; write=0.003 s, sync=0.001 s, total=0.010 s; sync files=2, longest=0.001 s, average=0.001 s; distance=0 kB, estimate=0 kB; lsn=0/1AE4558, redo lsn=0/1AE4520
slms-postgres-prod    | 2026-03-03 03:40:45.645 UTC [429] LOG:  could not receive data from client: Connection reset by peer
slms-postgres-prod    | 2026-03-03 03:42:54.707 UTC [543] LOG:  could not receive data from client: Connection reset by peer
slms-redis-prod       | 1:C 03 Mar 2026 03:32:58.884 # WARNING Memory overcommit must be enabled! Without it, a background save or replication may fail under low memory condition. Being disabled, it can also cause failures without low memory condition, see https://github.com/jemalloc/jemalloc/issues/1328. To fix this issue add 'vm.overcommit_memory = 1' to /etc/sysctl.conf and then reboot or run the command 'sysctl vm.overcommit_memory=1' for this to take effect.
slms-redis-prod       | 1:C 03 Mar 2026 03:32:58.884 * oO0OoO0OoO0Oo Redis is starting oO0OoO0OoO0Oo
slms-redis-prod       | 1:C 03 Mar 2026 03:32:58.884 * Redis version=7.4.8, bits=64, commit=00000000, modified=0, pid=1, just started
slms-redis-prod       | 1:C 03 Mar 2026 03:32:58.884 * Configuration loaded
slms-redis-prod       | 1:M 03 Mar 2026 03:32:58.885 * Increased maximum number of open files to 10032 (it was originally set to 1024).
slms-redis-prod       | 1:M 03 Mar 2026 03:32:58.885 * monotonic clock: POSIX clock_gettime
slms-redis-prod       | 1:M 03 Mar 2026 03:32:58.885 * Running mode=standalone, port=6379.
slms-redis-prod       | 1:M 03 Mar 2026 03:32:58.886 * Server initialized
slms-redis-prod       | 1:M 03 Mar 2026 03:32:58.886 * Reading RDB base file on AOF loading...
slms-redis-prod       | 1:M 03 Mar 2026 03:32:58.886 * Loading RDB produced by version 7.4.8
slms-redis-prod       | 1:M 03 Mar 2026 03:32:58.886 * RDB age 1583 seconds
slms-redis-prod       | 1:M 03 Mar 2026 03:32:58.886 * RDB memory usage when created 0.90 Mb
slms-redis-prod       | 1:M 03 Mar 2026 03:32:58.886 * RDB is base AOF
slms-redis-prod       | 1:M 03 Mar 2026 03:32:58.886 * Done loading RDB, keys loaded: 0, keys expired: 0.
slms-redis-prod       | 1:M 03 Mar 2026 03:32:58.886 * DB loaded from base file appendonly.aof.1.base.rdb: 0.001 seconds
slms-redis-prod       | 1:M 03 Mar 2026 03:32:58.889 * DB loaded from incr file appendonly.aof.1.incr.aof: 0.003 seconds
slms-redis-prod       | 1:M 03 Mar 2026 03:32:58.889 * DB loaded from append only file: 0.004 seconds
slms-redis-prod       | 1:M 03 Mar 2026 03:32:58.889 * Opening AOF incr file appendonly.aof.1.incr.aof on server start
slms-redis-prod       | 1:M 03 Mar 2026 03:32:58.889 * Ready to accept connections tcp
slms-redis-prod       | 1:M 03 Mar 2026 03:37:59.089 * 100 changes in 300 seconds. Saving...
slms-redis-prod       | 1:M 03 Mar 2026 03:37:59.089 * Background saving started by pid 194
slms-redis-prod       | 194:C 03 Mar 2026 03:37:59.092 * DB saved on disk
slms-redis-prod       | 194:C 03 Mar 2026 03:37:59.093 * Fork CoW for RDB: current 0 MB, peak 0 MB, average 0 MB
slms-redis-prod       | 1:M 03 Mar 2026 03:37:59.190 * Background saving terminated with success
slms-api-prod         | Prisma schema loaded from prisma/schema.prisma
slms-api-prod         | Datasource "db": PostgreSQL database "slms", schema "public" at "postgres:5432"
slms-api-prod         |
slms-api-prod         | 18 migrations found in prisma/migrations
slms-api-prod         |
slms-api-prod         |
slms-api-prod         | No pending migrations to apply.
slms-api-prod         | npm notice
slms-api-prod         | npm notice New major version of npm available! 10.8.2 -> 11.11.0
slms-api-prod         | npm notice Changelog: https://github.com/npm/cli/releases/tag/v11.11.0
slms-api-prod         | npm notice To update run: npm install -g npm@11.11.0
slms-api-prod         | npm notice
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [NestFactory] Starting Nest application...
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] QueuesModule dependencies initialized +22ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] PrismaModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] PassportModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] PassportModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] ThrottlerModule dependencies initialized +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] ConfigHostModule dependencies initialized +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] DiscoveryModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] HealthModule dependencies initialized +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] ConfigModule dependencies initialized +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] ConfigModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] OrganizationsModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] ScheduleModule dependencies initialized +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [EmailService] Email transporter configured: mail.energi-up.com:465
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] AppModule dependencies initialized +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] BullModule dependencies initialized +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] BullModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] JwtModule dependencies initialized +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] JwtModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] PublicModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] CategoriesModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] SubContentsModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] TagsModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] DocumentsModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] CertificationsModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] LicensesModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] GrievancesModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] TraceabilityModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] UsersModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] RolesModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] NotificationsModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] AuditLogsModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] NotificationEngineModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] BullModule dependencies initialized +3ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] AdminAdminsModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] AdminUsersModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] UploadModule dependencies initialized +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] AdminAuthModule dependencies initialized +2ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [InstanceLoader] AuthModule dependencies initialized +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [Bootstrap] Swagger documentation enabled at /docs
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] AuthController {/api/v1/auth}: +2ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/auth/register, POST} route +2ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/auth/login, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/auth/refresh, POST} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/auth/logout, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/auth/me, GET} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/auth/verify-email, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/auth/resend-verification, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/auth/change-email, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/auth/forgot-password, POST} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/auth/reset-password, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] UsersController {/api/v1/users}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/users, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/users, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/users/:id, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/users/:id/roles, GET} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/users/:id/permissions, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/users/:id, PATCH} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/users/:id, DELETE} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] AdminAuthController {/api/v1/admin-auth}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin-auth/login, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin-auth/logout, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin-auth/me, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] RolesController {/api/v1/roles}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/roles, GET} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/roles/permissions, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/roles/:id, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/roles, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/roles/:id, PATCH} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/roles/:id, DELETE} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] OrganizationsController {/api/v1/organizations}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] CategoriesController {/api/v1/admin/categories}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/categories, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/categories/:id, GET} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/categories, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/categories/:id, PUT} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/categories/:id, DELETE} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] SubContentsController {/api/v1/admin/categories/:categoryId/sub-contents}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/categories/:categoryId/sub-contents, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/categories/:categoryId/sub-contents/:id, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/categories/:categoryId/sub-contents, POST} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/categories/:categoryId/sub-contents/:id, PUT} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/categories/:categoryId/sub-contents/:id, DELETE} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] TagsController {/api/v1/admin/tags}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/tags, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/tags/:id, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/tags, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/tags/:id, PUT} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/tags/:id, DELETE} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] DocumentsController {/api/v1/admin/documents}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/documents, GET} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/documents/deleted, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/documents/:id, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/documents, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/documents/:id, PUT} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/documents/:id, DELETE} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/documents/:id/restore, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] CertificationsController {/api/v1/certifications}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/certifications/notification-rules, GET} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/certifications, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/certifications/:id, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/certifications, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/certifications/:id, PUT} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/certifications/:id, DELETE} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] LicensesController {/api/v1/licenses}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/licenses/notification-rules, GET} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/licenses, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/licenses/:id, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/licenses, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/licenses/:id, PUT} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/licenses/:id, DELETE} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] GrievancesController {/api/v1/admin/grievances}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/grievances, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/grievances/:id, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/grievances, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/grievances/:id, PUT} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/grievances/:id, DELETE} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] TraceabilityController {/api/v1/admin/traceability}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/traceability/entities, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/traceability/entities/:id, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/traceability/entities, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/traceability/entities/:id, PUT} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/traceability/entities/:id, DELETE} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/traceability/records, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/traceability/records, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/traceability/records/:id, DELETE} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] PublicController {/api/v1/public}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/navigation, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/files/preview, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/categories, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/categories/:slug, GET} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/categories/:slug/sub-contents, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/categories/:slug/sub-contents/:subSlug/documents, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/categories/:slug/sub-contents/:subSlug/licenses, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/categories/:slug/sub-contents/:subSlug/certifications, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/tags, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/policies, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/certifications, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/licenses, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/library, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/library/:id, GET} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/grievances, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/traceability, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/public/traceability/entities, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] UploadController {/api/v1/admin/upload}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/upload/presign, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/upload/upload, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] NotificationsController {/api/v1/notifications}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/notifications, GET} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/notifications/unread-count, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/notifications/:id, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/notifications/:id/read, PATCH} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/notifications/mark-all-read, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/notifications/:id, DELETE} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/notifications/rules/all, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/notifications/rules/:id, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/notifications/rules, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/notifications/rules/:id, PATCH} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/notifications/rules/:id/toggle, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/notifications/rules/:id, DELETE} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] AuditLogsController {/api/v1/audit-logs}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/audit-logs, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/audit-logs/entity-types, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/audit-logs/actions, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/audit-logs/user/:email, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/audit-logs/entity/:entityType/:entityId, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/audit-logs/:id, GET} route +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] AdminUsersController {/api/v1/admin/users}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/users, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/users/:id, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/users/:id, PATCH} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/users/:id/role, PATCH} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/users/:id/status, PATCH} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] AdminAdminsController {/api/v1/admin/admins}: +1ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/admins, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/admins/:id, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/admins, POST} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/admin/admins/:id, PATCH} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RoutesResolver] HealthController {/api/v1/health}: +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/health, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/health/ready, GET} route +0ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [RouterExplorer] Mapped {/api/v1/health/live, GET} route +0ms
slms-api-prod         | prisma:info Starting a postgresql pool with 3 connections.
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [PrismaService] Connected to database
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [NestApplication] Nest application successfully started +15ms
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [Bootstrap] 🚀 SLMS API running on http://localhost:3001
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [Bootstrap] 📚 Swagger docs: http://localhost:3001/docs
slms-api-prod         | [Nest] 1  - 03/03/2026, 3:42:55 AM     LOG [Bootstrap] 🔗 API endpoint: http://localhost:3001/api/v1
