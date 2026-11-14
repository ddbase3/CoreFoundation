# CoreFoundation

CoreFoundation owns the contracts, models, DTOs, exceptions, shared abstract classes and neutral helpers formerly shipped within the BASE3 Framework source tree. Its PHP namespace is `Base3\CoreFoundation`.

This module must never depend on `Core`. All concrete runtime bindings are provided by `Core` or by host/project plugins.

The module ID, PHP namespace and runtime technical names are separate identities. Consumers should use the Foundation interfaces for dependency injection.
