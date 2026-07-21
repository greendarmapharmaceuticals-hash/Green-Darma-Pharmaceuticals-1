# 09-CODING_STANDARDS.md

# Green Darma Pharmaceuticals

## Coding Standards

### Objective
Maintain clean, scalable and production-ready Laravel code.

## General Rules
- Follow PSR-12
- SOLID principles
- DRY (Don't Repeat Yourself)
- KISS (Keep It Simple)
- Meaningful naming

## Laravel Standards
- Thin Controllers
- Business logic in Services
- Form Request Validation
- Eloquent Relationships
- Route Model Binding
- Blade Components for reusable UI

## Database
- Use migrations
- Foreign keys
- Index searchable columns
- Avoid duplicate data

## Security
- CSRF Protection
- XSS Prevention
- SQL Injection Prevention
- Validate every request
- Escape output

## Frontend
- Mobile-first
- Responsive
- Accessible
- Reusable components
- Optimized assets

## Images
- WebP preferred
- Compress uploads
- Lazy loading
- ALT text required

## Git Workflow
- Small commits
- Clear commit messages
- One feature per commit
- Never commit secrets or .env

## Testing
- Test each feature before moving on
- Fix warnings immediately
- No broken pages
- Verify responsive layouts

## Documentation
Update documentation whenever a feature changes.

## Final Goal
Every module should be maintainable, readable, secure and production-ready.
