# Privacy and data handling: CoreFoundation

CoreFoundation contains PHP contracts and data types. It does not register a storage backend, network transport or independent background task. DTO and model instances may hold user or personal data when populated by consuming applications; handling, storage, retention and deletion are determined by the active owning implementation and host.

This document does not assert legal compliance for deployments. See the consuming implementations' verified `PRIVACY.md` and the repository privacy requirements.
